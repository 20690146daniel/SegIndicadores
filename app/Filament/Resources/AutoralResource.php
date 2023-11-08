<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AutoralResource\Pages;
use App\Filament\Resources\AutoralResource\RelationManagers;
use App\Models\Autoral;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AutoralResource extends Resource
{
    protected static ?string $model = Autoral::class;

    protected static ?string $navigationIcon = 'heroicon-o-user';

    protected static ?string $modelLabel = 'Autoral';

    protected static ?string $pluralModelLabel = "Autorales";
    
    protected static ?string $slug = "Autorales";

     public static $tipo_autoral = ["Arquitectónica","Arte aplicado","Audiovisual", "Base de datos","Caricatura","Cinematográfica","Danza","De carácter plástico","Dibujo","Dramática","Escultórica","Fotográfica","Historieta","Literaria","Música con letra","Música sin letra","Pictórica","Programa de cómputo","Programa de radio","Programa de televisión"];


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('tipo')

                    ->required()
                    ->options(AutoralResource::$tipo_autoral),
                Forms\Components\TextInput::make('clave')
                    ->required()
                    ->maxLength(255),
                Forms\Components\DatePicker::make('fecha_registro')
                    ->label('Fecha registro')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('tipo')
                ->formatStateUsing(fn(string $state): string => AutoralResource::$tipo_autoral[$state])
                    ->searchable(),
                Tables\Columns\TextColumn::make('clave')
                    ->searchable(),
                Tables\Columns\TextColumn::make('fecha_registro')
                    ->date()
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
            'index' => Pages\ListAutorals::route('/'),
            'create' => Pages\CreateAutoral::route('/create'),
            'edit' => Pages\EditAutoral::route('/{record}/edit'),
        ];
    }    
}
