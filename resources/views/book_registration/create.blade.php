<x-layout title="Book Registration">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="bg-white/5 border border-white/10 backdrop-blur-md rounded-3xl p-8 shadow-2xl">
            {{-- CRITICAL: Added enctype for file uploads --}}
            <form method="POST" action="/books" enctype="multipart/form-data">
                @csrf
                
                <div class="border-b border-white/10 pb-8 mb-8">
                    <h2 class="text-3xl font-black text-white tracking-tight">Book Registration</h2>
                    <p class="mt-2 text-blue-200/60 text-sm">Fill in the book details required for the library database.</p>
                </div>

                <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    
                    <div class="sm:col-span-4">
                        <label for="title" class="block text-sm font-semibold text-blue-100 mb-2">Book Title</label>
                        <input id="title" type="text" name="title" value="{{ old('title') }}" required
                            class="block w-full rounded-xl bg-white/10 border border-white/10 px-4 py-2.5 text-white focus:ring-2 focus:ring-amber-400 outline-none transition-all" />
                    </div>

                    <div class="sm:col-span-2">
                        <label for="isbn" class="block text-sm font-semibold text-blue-100 mb-2">ISBN</label>
                        <input id="isbn" type="text" name="isbn" required
                            class="block w-full rounded-xl bg-white/10 border border-white/10 px-4 py-2.5 text-white focus:ring-2 focus:ring-amber-400 outline-none" />
                    </div>

                    <div class="sm:col-span-3">
                        <label for="author" class="block text-sm font-semibold text-blue-100 mb-2">Author</label>
                        <input id="author" type="text" name="author" required
                            class="block w-full rounded-xl bg-white/10 border border-white/10 px-4 py-2.5 text-white focus:ring-2 focus:ring-amber-400 outline-none" />
                    </div>

                    <div class="sm:col-span-3">
                        <label for="publisher" class="block text-sm font-semibold text-blue-100 mb-2">Publisher</label>
                        <input id="publisher" type="text" name="publisher" required
                            class="block w-full rounded-xl bg-white/10 border border-white/10 px-4 py-2.5 text-white focus:ring-2 focus:ring-amber-400 outline-none" />
                    </div>

                    <div class="sm:col-span-3">
                        <label for="genre" class="block text-sm font-semibold text-blue-100 mb-2">Genre</label>
                        <select id="genre" name="genre" required
                            class="block w-full rounded-xl bg-white/10 border border-white/10 px-4 py-3 text-white focus:ring-2 focus:ring-amber-400 outline-none">
                            <option value="" class="bg-gray-900">Select a Genre</option>
                            <option value="fiction" class="bg-gray-900">Fiction</option>
                            <option value="horror" class="bg-gray-900">Horror</option>
                            <option value="slice-of-life" class="bg-gray-900">Slice of life</option>
                            <option value="romance" class="bg-gray-900">Romance</option>
                            <option value="sci-fi" class="bg-gray-900">Sci-Fi</option>
                            <option value="mystery" class="bg-gray-900">Mystery</option>
                        </select>
                    </div>

                    <div class="col-span-full">
                        <label for="description" class="block text-sm font-semibold text-blue-100 mb-2">Description</label>
                        <textarea id="description" name="description" rows="3" required
                            class="block w-full rounded-xl bg-white/10 border border-white/10 px-4 py-2.5 text-white focus:ring-2 focus:ring-amber-400 outline-none">{{ old('description') }}</textarea>
                    </div>

                    <div class="sm:col-span-2">
                        <label for="published_year" class="block text-sm font-semibold text-blue-100 mb-2">Year</label>
                        <input id="published_year" type="number" name="published_year" required
                            class="block w-full rounded-xl bg-white/10 border border-white/10 px-4 py-2.5 text-white focus:ring-2 focus:ring-amber-400 outline-none" />
                    </div>

                    <div class="sm:col-span-2">
                        <label for="pages" class="block text-sm font-semibold text-blue-100 mb-2">Pages</label>
                        <input id="pages" type="number" name="pages" required
                            class="block w-full rounded-xl bg-white/10 border border-white/10 px-4 py-2.5 text-white focus:ring-2 focus:ring-amber-400 outline-none" />
                    </div>

                    <div class="sm:col-span-2">
                        <label for="price" class="block text-sm font-semibold text-blue-100 mb-2">Price</label>
                        <input id="price" type="number" step="0.01" name="price" required
                            class="block w-full rounded-xl bg-white/10 border border-white/10 px-4 py-2.5 text-white focus:ring-2 focus:ring-amber-400 outline-none" />
                    </div>

                    <div class="sm:col-span-4">
                        <label for="cover_image" class="block text-sm font-semibold text-blue-100 mb-2">Cover Image</label>
                        <input id="cover_image" type="file" name="cover_image" 
                            class="block w-full text-sm text-blue-200 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-amber-400 file:text-amber-950 hover:file:bg-amber-300" />
                    </div>

                    <div class="sm:col-span-2 flex items-end pb-3">
                        <div class="flex items-center h-5">
                            <input id="is_available" name="is_available" type="checkbox" value="1"
                                class="h-5 w-5 rounded border-white/10 bg-white/10 text-amber-400 focus:ring-amber-400">
                        </div>
                        <div class="ml-3 text-sm">
                            <label for="is_available" class="font-medium text-blue-100">Is Available</label>
                        </div>
                    </div>
                </div>

                <div class="mt-12 flex items-center justify-end gap-x-4 pt-8 border-t border-white/10">
                    <button type="submit" class="bg-amber-400 hover:bg-amber-300 text-amber-950 px-8 py-2.5 rounded-xl font-black text-sm transition-all active:scale-95">
                        Register Book
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-layout>