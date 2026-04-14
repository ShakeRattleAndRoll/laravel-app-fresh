<x-layout title="Edit Book | {{ $book->title }}">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        
        <div class="mb-8 flex justify-between items-center">
            <a href="/books" class="text-blue-300 hover:text-white transition-colors text-sm flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Cancel and Go Back
            </a>
            <span class="text-xs font-mono text-blue-200/30 tracking-widest uppercase">Editing ISBN: {{ $book->isbn }}</span>
        </div>

        <div class="bg-white/5 border border-white/10 backdrop-blur-md rounded-3xl p-8 shadow-2xl relative overflow-hidden">
            <div class="absolute top-0 right-0 -mr-16 -mt-16 w-64 h-64 bg-amber-500/10 rounded-full blur-3xl"></div>

            <form method="POST" action="/books/{{ $book->id }}">
                @csrf
                @method('PATCH')
                
                <div class="border-b border-white/10 pb-8 mb-8">
                    <h2 class="text-3xl font-black text-white tracking-tight">Update Book Details</h2>
                    <p class="mt-2 text-blue-200/60 text-sm">Modifying details for <span class="text-amber-300 font-semibold">{{ $book->title }}</span>.</p>
                </div>

                <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    
                    {{-- Title --}}
                    <div class="sm:col-span-4">
                        <label for="title" class="block text-sm font-semibold text-blue-100 mb-2">Book Title</label>
                        <input id="title" type="text" name="title" value="{{ $book->title }}" required
                            class="block w-full rounded-xl bg-white/10 border border-white/10 px-4 py-2.5 text-white focus:ring-2 focus:ring-amber-400 focus:border-transparent outline-none transition-all" />
                    </div>

                    {{-- ISBN --}}
                    <div class="sm:col-span-2">
                        <label for="isbn" class="block text-sm font-semibold text-blue-100 mb-2">ISBN</label>
                        <input id="isbn" type="text" name="isbn" value="{{ $book->isbn }}" required
                            class="block w-full rounded-xl bg-white/10 border border-white/10 px-4 py-2.5 text-white focus:ring-2 focus:ring-amber-400 outline-none" />
                    </div>

                    {{-- Author --}}
                    <div class="sm:col-span-3">
                        <label for="author" class="block text-sm font-semibold text-blue-100 mb-2">Author</label>
                        <input id="author" type="text" name="author" value="{{ $book->author }}" required
                            class="block w-full rounded-xl bg-white/10 border border-white/10 px-4 py-2.5 text-white focus:ring-2 focus:ring-amber-400 outline-none" />
                    </div>

                    {{-- Publisher --}}
                    <div class="sm:col-span-3">
                        <label for="publisher" class="block text-sm font-semibold text-blue-100 mb-2">Publisher</label>
                        <input id="publisher" type="text" name="publisher" value="{{ $book->publisher }}" required
                            class="block w-full rounded-xl bg-white/10 border border-white/10 px-4 py-2.5 text-white focus:ring-2 focus:ring-amber-400 outline-none" />
                    </div>

                    {{-- Genre --}}
                    <div class="sm:col-span-3">
                        <label for="genre" class="block text-sm font-semibold text-blue-100 mb-2">Genre</label>
                        <select id="genre" name="genre" required
                            class="block w-full rounded-xl bg-white/10 border border-white/10 px-4 py-3 text-white focus:ring-2 focus:ring-amber-400 outline-none">
                            <option value="Fiction" {{ $book->genre == 'Fiction' ? 'selected' : '' }}>Fiction</option>
                            <option value="Non-Fiction" {{ $book->genre == 'Non-Fiction' ? 'selected' : '' }}>Non-Fiction</option>
                            <option value="Sci-Fi" {{ $book->genre == 'Sci-Fi' ? 'selected' : '' }}>Sci-Fi</option>
                        </select>
                    </div>

                    {{-- Year --}}
                    <div class="sm:col-span-3">
                        <label for="published_year" class="block text-sm font-semibold text-blue-100 mb-2">Published Year</label>
                        <input id="published_year" type="number" name="published_year" value="{{ $book->published_year }}" required
                            class="block w-full rounded-xl bg-white/10 border border-white/10 px-4 py-2.5 text-white focus:ring-2 focus:ring-amber-400 outline-none" />
                    </div>

                    {{-- Description --}}
                    <div class="col-span-full">
                        <label for="description" class="block text-sm font-semibold text-blue-100 mb-2">Description</label>
                        <textarea id="description" name="description" rows="3" required
                            class="block w-full rounded-xl bg-white/10 border border-white/10 px-4 py-2.5 text-white focus:ring-2 focus:ring-amber-400 outline-none">{{ $book->description }}</textarea>
                    </div>

                    {{-- Price --}}
                    <div class="sm:col-span-3">
                        <label for="price" class="block text-sm font-semibold text-blue-100 mb-2">Price ($)</label>
                        <input id="price" type="number" step="0.01" name="price" value="{{ $book->price }}" required
                            class="block w-full rounded-xl bg-white/10 border border-white/10 px-4 py-2.5 text-white focus:ring-2 focus:ring-amber-400 outline-none" />
                    </div>

                    {{-- Pages --}}
                    <div class="sm:col-span-3">
                        <label for="pages" class="block text-sm font-semibold text-blue-100 mb-2">Total Pages</label>
                        <input id="pages" type="number" name="pages" value="{{ $book->pages }}" required
                            class="block w-full rounded-xl bg-white/10 border border-white/10 px-4 py-2.5 text-white focus:ring-2 focus:ring-amber-400 outline-none" />
                    </div>

                    <div class="sm:col-span-3 flex items-end pb-3">
                        <div class="flex items-center h-5">
                            <input id="is_available" name="is_available" type="checkbox" value="1"
                                {{ $book->is_available ? 'checked' : '' }}
                                class="h-5 w-5 rounded border-white/10 bg-white/10 text-amber-400 focus:ring-amber-400">
                        </div>
                        <div class="ml-3 text-sm">
                            <label for="is_available" class="font-medium text-blue-100">Is Available</label>
                        </div>
                    </div>

                </div>

                <div class="mt-12 flex items-center justify-end gap-x-4 pt-8 border-t border-white/10">
                    <a href="/books" class="px-6 py-2.5 text-sm font-bold text-red-400 hover:bg-red-400/10 rounded-xl transition-all">
                        Discard Changes
                    </a>
                    <button type="submit" 
                        class="bg-amber-400 hover:bg-amber-300 text-amber-950 px-8 py-2.5 rounded-xl font-black text-sm transition-all shadow-lg shadow-amber-400/20 active:scale-95 cursor-pointer">
                        Update Book Record
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-layout>