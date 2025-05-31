<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PesananResource\Pages;
use App\Models\Pesanan;
use App\Models\User;
use App\Models\AlamatPengirim;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Infolists\Infolist;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Components\RepeatableEntry;
use Filament\Tables\Actions\Action;
use Illuminate\Database\Eloquent\Builder;
use Filament\Support\Colors\Color;
use Filament\Forms\Components\Repeater;

class PesananResource extends Resource
{
    protected static ?string $model = Pesanan::class;

    protected static ?string $navigationIcon = 'heroicon-o-shopping-cart';

    protected static ?string $navigationLabel = 'Pesanan';

    protected static ?string $pluralModelLabel = 'Pesanan';

    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informasi Pesanan')
                    ->schema([
                        Forms\Components\TextInput::make('kode_pesanan')
                            ->label('Kode Pesanan')
                            ->disabled()
                            ->dehydrated(false),

                        Forms\Components\Select::make('user_id')
                            ->label('Customer')
                            ->relationship('user', 'name')
                            ->searchable()
                            ->preload()
                            ->required(),

                        Forms\Components\Select::make('alamat_pengiriman_id')
                            ->label('Alamat Pengiriman')
                            ->relationship('alamatPengiriman', 'alamat_lengkap')
                            ->searchable()
                            ->preload()
                            ->required(),

                        Forms\Components\Select::make('metode_pembayaran')
                            ->label('Metode Pembayaran')
                            ->options([
                                'gopay' => 'GoPay',
                                'ovo' => 'OVO',
                                'shopee_pay' => 'ShopeePay',
                                'dana' => 'DANA',
                            ])
                            ->required(),

                        Forms\Components\Select::make('status_pesanan')
                            ->label('Status Pesanan')
                            ->options([
                                'pending' => 'Pending',
                                'diproses' => 'Diproses',
                                'dikirim' => 'Dikirim',
                                'selesai' => 'Selesai',
                                'batal' => 'Batal',
                            ])
                            ->default('pending')
                            ->required(),

                        Forms\Components\Textarea::make('catatan')
                            ->label('Catatan')
                            ->rows(3)
                            ->columnSpanFull(),
                    ])
                    ->columns(2),

                Forms\Components\Section::make('Item Pesanan')
                    ->schema([
                        Repeater::make('pesananItems')
                            ->relationship()
                            ->schema([
                                Forms\Components\Select::make('produk_id')
                                    ->label('Produk')
                                    ->relationship('produk', 'nama_produk')
                                    ->searchable()
                                    ->preload()
                                    ->required()
                                    ->reactive()
                                    ->afterStateUpdated(function ($state, Forms\Set $set) {
                                        if ($state) {
                                            $produk = \App\Models\Produk::find($state);
                                            if ($produk) {
                                                $set('harga_satuan', $produk->harga);
                                            }
                                        }
                                    }),

                                Forms\Components\TextInput::make('ukuran')
                                    ->label('Ukuran')
                                    ->required(),

                                Forms\Components\TextInput::make('jumlah_beli')
                                    ->label('Jumlah')
                                    ->numeric()
                                    ->required()
                                    ->minValue(1)
                                    ->reactive()
                                    ->afterStateUpdated(function ($state, Forms\Get $get, Forms\Set $set) {
                                        $harga = $get('harga_satuan') ?? 0;
                                        $set('sub_total', $state * $harga);
                                    }),

                                Forms\Components\TextInput::make('harga_satuan')
                                    ->label('Harga Satuan')
                                    ->numeric()
                                    ->prefix('Rp')
                                    ->required()
                                    ->reactive()
                                    ->afterStateUpdated(function ($state, Forms\Get $get, Forms\Set $set) {
                                        $jumlah = $get('jumlah_beli') ?? 0;
                                        $set('sub_total', $state * $jumlah);
                                    }),

                                Forms\Components\TextInput::make('sub_total')
                                    ->label('Sub Total')
                                    ->numeric()
                                    ->prefix('Rp')
                                    ->disabled()
                                    ->dehydrated(),
                            ])
                            ->columns(5)
                            ->addActionLabel('Tambah Item')
                            ->collapsible()
                            ->cloneable(),
                    ]),

                Forms\Components\Section::make('Rincian Biaya')
                    ->schema([
                        Forms\Components\TextInput::make('total_harga')
                            ->label('Total Harga')
                            ->numeric()
                            ->prefix('Rp')
                            ->required(),

                        Forms\Components\TextInput::make('total_ongkos_kirim')
                            ->label('Ongkos Kirim')
                            ->numeric()
                            ->prefix('Rp')
                            ->default(0),

                        Forms\Components\TextInput::make('biaya_jasa_aplikasi')
                            ->label('Biaya Jasa Aplikasi')
                            ->numeric()
                            ->prefix('Rp')
                            ->default(0),

                        Forms\Components\TextInput::make('biaya_layanan')
                            ->label('Biaya Layanan')
                            ->numeric()
                            ->prefix('Rp')
                            ->default(0),

                        Forms\Components\TextInput::make('total_biaya')
                            ->label('Total Biaya')
                            ->numeric()
                            ->prefix('Rp')
                            ->required(),
                    ])
                    ->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('kode_pesanan')
                    ->label('Kode Pesanan')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('user.name')
                    ->label('Customer')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('total_biaya')
                    ->label('Total Biaya')
                    ->money('IDR')
                    ->sortable(),

                Tables\Columns\SelectColumn::make('status_pesanan')
                    ->label('Status')
                    ->options([
                        'pending' => 'Pending',
                        'diproses' => 'Diproses',
                        'dikirim' => 'Dikirim',
                        'selesai' => 'Selesai',
                        'batal' => 'Batal',
                    ])
                    ->selectablePlaceholder(false),

                Tables\Columns\BadgeColumn::make('metode_pembayaran')
                    ->label('Pembayaran')
                    ->colors([
                        'success' => 'gopay',
                        'primary' => 'ovo',
                        'warning' => 'shopee_pay',
                        'info' => 'dana',
                    ])
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'gopay' => 'GoPay',
                        'ovo' => 'OVO',
                        'shopee_pay' => 'ShopeePay',
                        'dana' => 'DANA',
                        default => $state,
                    }),

                Tables\Columns\BadgeColumn::make('payment.status_bayar')
                    ->label('Status Bayar')
                    ->colors([
                        'danger' => 'belum_bayar',
                        'warning' => 'menunggu_verifikasi',
                        'success' => 'sukses',
                        'secondary' => 'gagal',
                    ])
                    ->formatStateUsing(fn (?string $state): string => match ($state) {
                        'belum_bayar' => 'Belum Bayar',
                        'menunggu_verifikasi' => 'Menunggu Verifikasi',
                        'sukses' => 'Sukses',
                        'gagal' => 'Gagal',
                        default => 'Belum Bayar',
                    }),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Tanggal Pesanan')
                    ->dateTime('d M Y H:i')
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status_pesanan')
                    ->label('Status Pesanan')
                    ->options([
                        'pending' => 'Pending',
                        'diproses' => 'Diproses',
                        'dikirim' => 'Dikirim',
                        'selesai' => 'Selesai',
                        'batal' => 'Batal',
                    ]),

                Tables\Filters\SelectFilter::make('metode_pembayaran')
                    ->label('Metode Pembayaran')
                    ->options([
                        'gopay' => 'GoPay',
                        'ovo' => 'OVO',
                        'shopee_pay' => 'ShopeePay',
                        'dana' => 'DANA',
                    ]),

                Tables\Filters\Filter::make('created_at')
                    ->form([
                        Forms\Components\DatePicker::make('created_from')
                            ->label('Dari Tanggal'),
                        Forms\Components\DatePicker::make('created_until')
                            ->label('Sampai Tanggal'),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when(
                                $data['created_from'],
                                fn (Builder $query, $date): Builder => $query->whereDate('created_at', '>=', $date),
                            )
                            ->when(
                                $data['created_until'],
                                fn (Builder $query, $date): Builder => $query->whereDate('created_at', '<=', $date),
                            );
                    })
                    ->indicateUsing(function (array $data): array {
                        $indicators = [];
                        if ($data['created_from'] ?? null) {
                            $indicators['created_from'] = 'Dari: ' . \Carbon\Carbon::parse($data['created_from'])->toFormattedDateString();
                        }
                        if ($data['created_until'] ?? null) {
                            $indicators['created_until'] = 'Sampai: ' . \Carbon\Carbon::parse($data['created_until'])->toFormattedDateString();
                        }
                        return $indicators;
                    }),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                
                Action::make('proses')
                    ->label('Proses')
                    ->icon('heroicon-o-cog-6-tooth')
                    ->color('warning')
                    ->visible(fn (Pesanan $record): bool => $record->status_pesanan === 'pending')
                    ->requiresConfirmation()
                    ->modalHeading('Proses Pesanan')
                    ->modalDescription('Apakah Anda yakin ingin memproses pesanan ini?')
                    ->action(fn (Pesanan $record) => $record->update(['status_pesanan' => 'diproses']))
                    ->successNotificationTitle('Pesanan sedang diproses'),

                Action::make('kirim')
                    ->label('Kirim')
                    ->icon('heroicon-o-truck')
                    ->color('info')
                    ->visible(fn (Pesanan $record): bool => $record->status_pesanan === 'diproses')
                    ->requiresConfirmation()
                    ->modalHeading('Kirim Pesanan')
                    ->modalDescription('Apakah Anda yakin ingin mengirim pesanan ini?')
                    ->action(fn (Pesanan $record) => $record->update(['status_pesanan' => 'dikirim']))
                    ->successNotificationTitle('Pesanan sedang dikirim'),

                Action::make('selesai')
                    ->label('Selesai')
                    ->icon('heroicon-o-check-badge')
                    ->color('success')
                    ->visible(fn (Pesanan $record): bool => $record->status_pesanan === 'dikirim')
                    ->requiresConfirmation()
                    ->modalHeading('Selesaikan Pesanan')
                    ->modalDescription('Apakah Anda yakin pesanan ini sudah selesai?')
                    ->action(fn (Pesanan $record) => $record->update(['status_pesanan' => 'selesai']))
                    ->successNotificationTitle('Pesanan selesai'),

                Action::make('batal')
                    ->label('Batalkan')
                    ->icon('heroicon-o-x-circle')
                    ->color('danger')
                    ->visible(fn (Pesanan $record): bool => !in_array($record->status_pesanan, ['selesai', 'batal']))
                    ->requiresConfirmation()
                    ->modalHeading('Batalkan Pesanan')
                    ->modalDescription('Apakah Anda yakin ingin membatalkan pesanan ini?')
                    ->form([
                        Forms\Components\Textarea::make('alasan_batal')
                            ->label('Alasan Pembatalan')
                            ->required()
                            ->rows(3),
                    ])
                    ->action(function (Pesanan $record, array $data) {
                        $record->update([
                            'status_pesanan' => 'batal',
                            'catatan' => ($record->catatan ? $record->catatan . "\n\n" : '') . 'Dibatalkan: ' . $data['alasan_batal']
                        ]);
                    })
                    ->successNotificationTitle('Pesanan dibatalkan'),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    
                    Tables\Actions\BulkAction::make('ubah_status')
                        ->label('Ubah Status')
                        ->icon('heroicon-o-pencil-square')
                        ->form([
                            Forms\Components\Select::make('status_pesanan')
                                ->label('Status Pesanan')
                                ->options([
                                    'pending' => 'Pending',
                                    'diproses' => 'Diproses',
                                    'dikirim' => 'Dikirim',
                                    'selesai' => 'Selesai',
                                    'batal' => 'Batal',
                                ])
                                ->required(),
                        ])
                        ->action(function (array $data, $records) {
                            $records->each(function ($record) use ($data) {
                                $record->update(['status_pesanan' => $data['status_pesanan']]);
                            });
                        })
                        ->deselectRecordsAfterCompletion()
                        ->successNotificationTitle('Status pesanan berhasil diubah'),
                ]),
            ])
            ->defaultSort('created_at', 'desc');
    }

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                Section::make('Informasi Pesanan')
                    ->schema([
                        TextEntry::make('kode_pesanan')
                            ->label('Kode Pesanan'),
                        TextEntry::make('user.name')
                            ->label('Customer'),
                        TextEntry::make('alamatPengiriman.alamat_lengkap')
                            ->label('Alamat Pengiriman'),
                        TextEntry::make('status_pesanan')
                            ->label('Status Pesanan')
                            ->badge()
                            ->color(fn (string $state): string => match ($state) {
                                'pending' => 'warning',
                                'diproses' => 'primary',
                                'dikirim' => 'info',
                                'selesai' => 'success',
                                'batal' => 'danger',
                                default => 'secondary',
                            }),
                        TextEntry::make('metode_pembayaran')
                            ->label('Metode Pembayaran')
                            ->formatStateUsing(fn (string $state): string => match ($state) {
                                'gopay' => 'GoPay',
                                'ovo' => 'OVO',
                                'shopee_pay' => 'ShopeePay',
                                'dana' => 'DANA',
                                default => $state,
                            }),
                        TextEntry::make('created_at')
                            ->label('Tanggal Pesanan')
                            ->dateTime('d M Y H:i'),
                    ])
                    ->columns(2),

                Section::make('Item Pesanan')
                    ->schema([
                        RepeatableEntry::make('pesananItems')
                            ->schema([
                                TextEntry::make('produk.nama')
                                    ->label('Produk'),
                                TextEntry::make('ukuran')
                                    ->label('Ukuran'),
                                TextEntry::make('jumlah_beli')
                                    ->label('Jumlah'),
                                TextEntry::make('harga_satuan')
                                    ->label('Harga Satuan')
                                    ->money('IDR'),
                                TextEntry::make('sub_total')
                                    ->label('Sub Total')
                                    ->money('IDR'),
                            ])
                            ->columns(5),
                    ]),

                Section::make('Rincian Biaya')
                    ->schema([
                        TextEntry::make('total_harga')
                            ->label('Total Harga')
                            ->money('IDR'),
                        TextEntry::make('total_ongkos_kirim')
                            ->label('Ongkos Kirim')
                            ->money('IDR'),
                        TextEntry::make('biaya_jasa_aplikasi')
                            ->label('Biaya Jasa Aplikasi')
                            ->money('IDR'),
                        TextEntry::make('biaya_layanan')
                            ->label('Biaya Layanan')
                            ->money('IDR'),
                        TextEntry::make('total_biaya')
                            ->label('Total Biaya')
                            ->money('IDR')
                            ->weight('bold'),
                    ])
                    ->columns(2),

                Section::make('Informasi Pembayaran')
                    ->schema([
                        TextEntry::make('payment.kode_pembayaran')
                            ->label('Kode Pembayaran'),
                        TextEntry::make('payment.status_bayar')
                            ->label('Status Pembayaran')
                            ->badge()
                            ->color(fn (?string $state): string => match ($state) {
                                'belum_bayar' => 'danger',
                                'menunggu_verifikasi' => 'warning',
                                'sukses' => 'success',
                                'gagal' => 'danger',
                                default => 'secondary',
                            })
                            ->formatStateUsing(fn (?string $state): string => match ($state) {
                                'belum_bayar' => 'Belum Bayar',
                                'menunggu_verifikasi' => 'Menunggu Verifikasi',
                                'sukses' => 'Sukses',
                                'gagal' => 'Gagal',
                                default => 'Belum Bayar',
                            }),
                        TextEntry::make('payment.total_pembayaran')
                            ->label('Total Pembayaran')
                            ->money('IDR'),
                        TextEntry::make('payment.tanggal_bayar')
                            ->label('Tanggal Bayar')
                            ->dateTime('d M Y H:i'),
                    ])
                    ->columns(2)
                    ->visible(fn (Pesanan $record): bool => $record->payment !== null),

                Section::make('Catatan')
                    ->schema([
                        TextEntry::make('catatan')
                            ->label('Catatan')
                            ->columnSpanFull(),
                    ])
                    ->visible(fn (Pesanan $record): bool => !empty($record->catatan)),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPesanans::route('/'),
            'create' => Pages\CreatePesanan::route('/create'),
            'edit' => Pages\EditPesanan::route('/{record}/edit'),
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::where('status_pesanan', 'pending')->count();
    }

    public static function getNavigationBadgeColor(): ?string
    {
        return static::getModel()::where('status_pesanan', 'pending')->count() > 0 ? 'warning' : null;
    }
}