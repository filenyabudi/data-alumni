<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AlumniResource\Pages;
use App\Filament\Resources\AlumniResource\RelationManagers;
use App\Models\Alumni;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AlumniResource extends Resource
{
    protected static ?string $model = Alumni::class;

    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';

    protected static ?string $navigationGroup = 'Data';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('mahasiswa_id')
                    ->label('NIM')
                    ->relationship('mahasiswa', 'nim')
                    ->searchable()
                    ->required()
                    ->reactive()
                    ->afterStateUpdated(fn(callable $set, $state) => $set('nama', \App\Models\Mahasiswa::find($state)?->nama))
                    ->afterStateUpdated(fn(callable $set, $state) => $set('tempat_lahir', \App\Models\Mahasiswa::find($state)?->tempat_lahir))
                    ->afterStateUpdated(fn(callable $set, $state) => $set('nik', \App\Models\Mahasiswa::find($state)?->nik))
                    ->afterStateUpdated(fn(callable $set, $state) => $set('hp', \App\Models\Mahasiswa::find($state)?->hp))
                    ->afterStateUpdated(fn(callable $set, $state) => $set('tahun_masuk', \App\Models\Mahasiswa::find($state)?->tahun_masuk)),
                Forms\Components\TextInput::make('nama')
                    ->disabled()
                    ->afterStateHydrated(fn(callable $set, $record) => $set('nama', $record ? \App\Models\Mahasiswa::find($record->mahasiswa_id)?->nama : null)),
                Forms\Components\TextInput::make('tempat_lahir')
                    ->disabled()
                    ->afterStateHydrated(fn(callable $set, $record) => $set('tempat_lahir', $record ? \App\Models\Mahasiswa::find($record->mahasiswa_id)?->tempat_lahir : null)),
                Forms\Components\TextInput::make('nik')
                    ->label("NIK")
                    ->disabled()
                    ->afterStateHydrated(fn(callable $set, $record) => $set('nik', $record ? \App\Models\Mahasiswa::find($record->mahasiswa_id)?->nik : null)),
                Forms\Components\TextInput::make('tahun_masuk')
                    ->disabled()
                    ->afterStateHydrated(fn(callable $set, $record) => $set('tahun_masuk', $record ? \App\Models\Mahasiswa::find($record->mahasiswa_id)?->tahun_masuk : null)),
                Forms\Components\TextInput::make('tahun_lulus')
                    ->numeric()
                    ->minValue(2000)
                    ->maxValue(2045),
                Forms\Components\TextInput::make('hp')
                    ->label("HP")
                    ->disabled()
                    ->afterStateHydrated(fn(callable $set, $record) => $set('hp', $record ? \App\Models\Mahasiswa::find($record->mahasiswa_id)?->hp : null)),
                Forms\Components\TextInput::make('ipk')
                    ->label("IPK")
                    ->required()
                    ->numeric()
                    ->maxValue(4)
                    ->step(0.01),
                Select::make('keterangan')
                    ->options([
                        'Dengan Pujian',
                        'Sangat Memuaskan',
                        'Memuaskan',
                    ])
                    ->required()
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('mahasiswa.nim')
                    ->label('NIM')
                    ->sortable(),
                Tables\Columns\TextColumn::make('mahasiswa.nama')
                    ->sortable(),
                Tables\Columns\TextColumn::make('mahasiswa.tahun_masuk')
                    ->label('Tahun Masuk')
                    ->searchable(),
                Tables\Columns\TextColumn::make('tahun_lulus')
                    ->searchable(),
                Tables\Columns\TextColumn::make('ipk')
                    ->label("IPK")
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('Lama Studi')
                    ->getStateUsing(fn($record) => ($record->tahun_lulus - $record->mahasiswa->tahun_masuk) . " Tahun")
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

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAlumnis::route('/'),
            'create' => Pages\CreateAlumni::route('/create'),
            'edit' => Pages\EditAlumni::route('/{record}/edit'),
        ];
    }
}
