








    <form method="POST" action="{{ route('events.store') }}" enctype="multipart/form-data">
        @csrf
        <label for="title">Titre:</label>
        <input type="text" id="title" name="title" required><br><br>
        
        <label for="description">Description:</label>
        <textarea id="description" name="description" required></textarea><br><br>
        
        <label for="date">Date:</label>
        <input type="date" id="date" name="date" required><br><br>
        
        <label for="image">Image:</label>
        <input type="file" id="image" name="image" accept="image/*" required><br><br>
        
        <label for="location">Location:</label>
        <input type="text" id="location" name="location" required><br><br>
        
        <label for="categorie_id">Catégorie:</label>
        <select id="categorie_id" name="categorie_id" required>
            @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select><br><br>
        
        <label for="available_places">Places disponibles:</label>
        <input type="number" id="available_places" name="available_places" required><br><br>
        
        <label for="type_of_reservation">Type de réservation:</label>
        <select id="type_of_reservation" name="type_of_reservation" required>
            <option value="Automatique">Automatique</option>
            <option value="par_confirmation">Par confirmation</option>
        </select><br><br>
        
        <button type="submit">Ajouter</button>
    </form>
    