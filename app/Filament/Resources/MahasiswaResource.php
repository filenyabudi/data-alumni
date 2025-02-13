<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MahasiswaResource\Pages;
use App\Filament\Resources\MahasiswaResource\RelationManagers;
use App\Models\Mahasiswa;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Actions;

class MahasiswaResource extends Resource
{
    protected static ?string $model = Mahasiswa::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    protected static ?string $navigationGroup = 'Master';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nim')
                    ->required()
                    ->numeric(),
                Forms\Components\Textarea::make('nama')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('nik')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('jk')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('nama_ibu')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('agama')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('tempat_lahir')
                    ->required()
                    ->maxLength(255),
                Forms\Components\DatePicker::make('tanggal_lahir')
                    ->required(),
                Forms\Components\Textarea::make('alamat')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('hp')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('email_kampus')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('email_pribadi')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('tahun_masuk')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nim')
                    ->sortable(),
                Tables\Columns\TextColumn::make('nama')
                    ->sortable(),
                Tables\Columns\TextColumn::make('jk')
                    ->searchable(),
                Tables\Columns\TextColumn::make('agama')
                    ->searchable(),
                Tables\Columns\TextColumn::make('tempat_lahir')
                    ->searchable(),
                Tables\Columns\TextColumn::make('tanggal_lahir')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('tahun_masuk')
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                // Tables\Actions\DeleteAction::make(),
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

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMahasiswas::route('/'),
            'create' => Pages\CreateMahasiswa::route('/create'),
            'edit' => Pages\EditMahasiswa::route('/{record}/edit'),
        ];
    }
}
