<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProdukResource\Pages;
use App\Filament\Resources\ProdukResource\RelationManagers;
use App\Models\Produk;
use App\Models\Kategori;
use App\Models\DetailProduk;
use App\Models\ProdukGambar;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\IconColumn;
use Illuminate\Support\Facades\Storage;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\Grid;
use Illuminate\Support\Str;

class ProdukResource extends Resource
{
    protected static ?string $model = Produk::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
         return $form
            ->schema([
                TextInput::make('nama')
                    ->required()
                    ->maxLength(255),

                Textarea::make('deskripsi')
                    ->required(),

                TextInput::make('harga')
                    ->numeric()
                    ->required(),

                TextInput::make('lokasi')
                    ->required()
                    ->maxLength(255),

                TextInput::make('jumlah_terjual')
                    ->numeric()
                    ->default(0),

                Select::make('kategori_id')
                    ->label('Kategori')
                    ->relationship('kategori', 'nama')
                    ->required(),

                Toggle::make('is_active')
                    ->label('Aktif')
                    ->default(true),

                Grid::make(2)
                    ->schema([
                        Repeater::make('detailProduks')
                            ->label('Detail Produk')
                            ->relationship()
                            ->schema([
                                TextInput::make('ukuran')->required(),
                                TextInput::make('stok')->numeric()->required(),
                            ])
                            ->collapsible(),

                        Repeater::make('produkGambars')
                            ->label('Gambar Produk')
                            ->relationship()
                            ->schema([
                                FileUpload::make('gambar')->required(),
                                Toggle::make('is_primary')->label('Gambar Utama'),
                                TextInput::make('urutan')->numeric(),
                            ])
                            ->collapsible(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
           ->columns([
                TextColumn::make('nama')->searchable()->sortable(),
                TextColumn::make('kategori.nama')->label('Kategori')->sortable(),
                TextColumn::make('harga')->money('IDR', true)->sortable(),
                TextColumn::make('jumlah_terjual')->label('Terjual')->sortable(),
                TextColumn::make('lokasi')->sortable(),
                IconColumn::make('is_active')->boolean()->label('Aktif'),
                TextColumn::make('detail_produks_info')
                    ->label('Ukuran & Stok')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->html()
                    ->getStateUsing(function ($record) {
                        return $record->detailProduks->map(fn ($d) => "<div>{$d->ukuran}: {$d->stok}</div>")->implode('');
                    }),

                TextColumn::make('produk_gambars_preview')
                    ->label('Gambar')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->html()
                    ->extraAttributes(['style' => 'max-width: 300px; white-space: normal']) // Perbesar lebar kolom
                    ->getStateUsing(function ($record) {
                        return optional($record->produkGambars)?->map(function ($g) {
                            $url = Storage::url($g->gambar);
                            return "<img src='{$url}' class='w-14 h-14 inline-block rounded object-cover mr-1 mb-1'>";
                        })->implode('') ?? '-';
                    }),
                TextColumn::make('created_at')->label('Dibuat')->dateTime('d M Y'),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->with(['detailProduks', 'produkGambars']);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProduks::route('/'),
            'create' => Pages\CreateProduk::route('/create'),
            'edit' => Pages\EditProduk::route('/{record}/edit'),
        ];
    }
}
