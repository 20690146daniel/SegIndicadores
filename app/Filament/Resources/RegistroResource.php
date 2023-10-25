<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RegistroResource\Pages;
use App\Filament\Resources\RegistroResource\RelationManagers;
use App\Models\Registro;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class RegistroResource extends Resource
{
    protected static ?string $model = Registro::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('user_id')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('nombre')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('proposito')
                    ->maxLength(255),
                Forms\Components\TextInput::make('autores')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Toggle::make('posicion_autor'),
                Forms\Components\Textarea::make('descripcion')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('sector_estrategico')
                    ->numeric(),
                Forms\Components\TextInput::make('subsector_estrategico')
                    ->numeric(),
                Forms\Components\TextInput::make('area _prioritaria_pais')
                    ->maxLength(255),
                Forms\Components\TextInput::make('area_conocimiento')
                    ->maxLength(255),
                Forms\Components\DatePicker::make('fecha_publicacion'),
                Forms\Components\TextInput::make('pais_publicacion')
                    ->label('Pais publicación')
                    ->maxLength(255),
                Forms\Components\TextInput::make('evidencia')
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('nombre')
                    ->searchable(),
                Tables\Columns\TextColumn::make('proposito')
                    ->searchable(),
                Tables\Columns\TextColumn::make('autores')
                    ->searchable(),
                Tables\Columns\IconColumn::make('posicion_autor')
                    ->boolean(),
                Tables\Columns\TextColumn::make('sector_estrategico')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('subsector_estrategico')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('area_prioritaria_pais')
                    ->searchable(),
                Tables\Columns\TextColumn::make('area_conocimiento')
                    ->searchable(),
                Tables\Columns\TextColumn::make('fecha_publicacion')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('pais_publicacion')
                    ->searchable(),
                Tables\Columns\TextColumn::make('evidencia')
                    ->searchable(),
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
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
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
            'index' => Pages\ListRegistros::route('/'),
            'create' => Pages\CreateRegistro::route('/create'),
            'edit' => Pages\EditRegistro::route('/{record}/edit'),
        ];
    }    
}
