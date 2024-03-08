<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>Formulaire d'ajout d'événement</title>
</head>
@yield('layouts.app')
<body class="bg-gray-100 p-6">
    
    <form method="POST" action="{{ route('events.store') }}" enctype="multipart/form-data" class="max-w-md bg-white rounded shadow-md p-8 mx-auto">
        @csrf
        
        <div class="mb-4">
            <label for="title" class="block text-gray-700 font-bold mb-2">Titre:</label>
            <input type="text" id="title" name="title" required class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>

        <div class="mb-4">
            <label for="description" class="block text-gray-700 font-bold mb-2">Description:</label>
            <textarea id="description" name="description" required class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"></textarea>
        </div>

        <div class="mb-4">
            <label for="date" class="block text-gray-700 font-bold mb-2">Date:</label>
            <input type="date" id="date" name="date" required class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>

        <div class="mb-4">
            <label for="image" class="block text-gray-700 font-bold mb-2">Image:</label>
            <input type="file" id="image" name="image" accept="image/*" required class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>

        <div class="mb-4">
            <label for="location" class="block text-gray-700 font-bold mb-2">Location:</label>
            <input type="text" id="location" name="location" required class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>

        <div class="mb-4">
            <label for="categorie_id" class="block text-gray-700 font-bold mb-2">Catégorie:</label>
            <select id="categorie_id" name="categorie_id" required class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="available_places" class="block text-gray-700 font-bold mb-2">Places disponibles:</label>
            <input type="number" id="available_places" name="available_places" required class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>

        <div class="mb-4">
            <label for="type_of_reservation" class="block text-gray-700 font-bold mb-2">Type de réservation:</label>
            <select id="type_of_reservation" name="type_of_reservation" required class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                <option value="Automatique">Automatique</option>
                <option value="par_confirmation">Par confirmation</option>
            </select>
        </div>

        <div>
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Ajouter</button>
        </div>
    </form>

</body>
</html>
