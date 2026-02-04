@csrf

<div class="space-y-4">
    <div>
        <label class="block mb-1 font-medium">Nom</label>
        <input type="text" name="name" value="{{ $product->name ?? '' }}"
               class="w-full border rounded-lg px-4 py-2">
    </div>

    <div>
        <label class="block mb-1 font-medium">Catégorie</label>
        <select name="category_id" class="w-full border rounded-lg px-4 py-2">
            @foreach($categories as $category)
                <option value="{{ $category->id }}"
                    {{ isset($product) && $product->category_id == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div>
        <label class="block mb-1 font-medium">Prix</label>
        <input type="number" name="price" value="{{ $product->price ?? '' }}"
               class="w-full border rounded-lg px-4 py-2">
    </div>

    <div>
        <label class="block mb-1 font-medium">Description</label>
        <textarea name="description" rows="4"
                  class="w-full border rounded-lg px-4 py-2">{{ $product->description ?? '' }}</textarea>
    </div>

    <div class="flex gap-4 pt-2">
        <button class="bg-green-600 text-white px-6 py-2 rounded-lg hover:bg-green-700">
            Enregistrer
        </button>
        <a href="{{ route('products.index') }}"
           class="bg-gray-300 px-6 py-2 rounded-lg hover:bg-gray-400">
            Annuler
        </a>
    </div>
</div>
