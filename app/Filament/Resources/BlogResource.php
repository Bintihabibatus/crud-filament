<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BlogResource\Pages;
use App\Models\Blog;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class BlogResource extends Resource
{
    protected static ?string $model = Blog::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

   public static function form(Form $form): Form
{
    return $form
        ->schema([
            TextInput::make('title')
                ->label('Title') // 👈 Judul → Title
                ->required()
                ->unique(ignoreRecord: true),
            Textarea::make('body')
                ->label('Body') // 👈 Isi → Body
                ->required(),
            TextInput::make('date')
                ->label('Date') // 👈 Tanggal → Date
                ->required()
                ->type('date'),
        ]);
}

    public static function table(Table $table): Table
{
    return $table
        ->columns([
            Tables\Columns\TextColumn::make('title')
                ->label('Title') // 👈 Dari 'Judul' jadi 'Title'
                ->sortable()
                ->searchable(),
            Tables\Columns\TextColumn::make('body')
                ->label('Body') // 👈 Dari 'Isi' jadi 'Body'
                ->limit(50),
            Tables\Columns\TextColumn::make('date')
                ->label('Date') // 👈 Dari 'Tanggal' jadi 'Date'
                ->date(),
        ])
        ->filters([
            //
        ])
        ->actions([
            Tables\Actions\EditAction::make(),
        ])
        ->bulkActions([
            Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListBlogs::route('/'),
            'create' => Pages\CreateBlog::route('/create'),
            'edit' => Pages\EditBlog::route('/{record}/edit'),
        ];
    }
}
