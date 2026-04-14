<x-layout title="Books List | Library-App">
    <div class="max-w-6xl mx-auto mt-12 px-4 pb-20">
        
        <div class="flex flex-col md:flex-row justify-between items-end mb-8 gap-4">
            <div>
                <h1 class="text-3xl font-black text-white tracking-tight">Book Management</h1>
                <p class="text-blue-200/60 text-sm mt-1">Reviewing active student records in the database.</p>
            </div>

            <a href="/books/create"
               class="flex items-center gap-2 bg-amber-400 hover:bg-amber-300 text-amber-950 px-5 py-2.5 rounded-xl font-bold text-sm transition-all shadow-lg shadow-amber-400/20 active:scale-95">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                </svg>
                Register New Book
            </a>
        </div>

        <div class="relative overflow-hidden bg-white/5 border border-white/10 backdrop-blur-md rounded-3xl shadow-2xl">
            <div class="overflow-x-auto">

                @if(session('success'))
                <div id="flash-msg" class="bg-green-600 text-white px-6 py-3 rounded-xl mb-6 flex justify-between items-center shadow-lg transition-opacity duration-500">
                    <span class="font-bold text-sm">{{ session('success') }}</span>
                </div>
                @endif

                <div class="bg-white/5 border border-white/10 rounded-2xl p-4 mb-8 shadow-sm">
                    <form action="/books" method="GET" class="grid grid-cols-1 md:grid-cols-12 gap-3 items-center">
                        
                        <div class="md:col-span-5 relative group">
                            <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-blue-200/40 group-focus-within:text-amber-400 transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                </svg>
                            </div>
                            <input type="text" name="search" value="{{ request('search') }}" 
                                placeholder="Search title or author..."
                                class="w-full bg-white/5 border border-white/10 rounded-xl pl-10 pr-4 py-2 text-sm text-white placeholder-blue-100/30 focus:ring-1 focus:ring-amber-400/50 focus:border-amber-400/50 outline-none transition-all">
                        </div>

                        <div class="md:col-span-3">
                            <select name="genre" class="w-full bg-white/5 border border-white/10 rounded-xl px-3 py-2 text-sm text-blue-100 outline-none focus:ring-1 focus:ring-amber-400/50 appearance-none cursor-pointer">
                                <option value="" class="bg-slate-900 text-white">All Genres</option>
                                @foreach($genres as $genre)
                                    <option value="{{ $genre }}" {{ request('genre') == $genre ? 'selected' : '' }} class="bg-slate-900 text-white">
                                        {{ ucfirst($genre) }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="md:col-span-2">
                            <select name="available" class="w-full bg-white/5 border border-white/10 rounded-xl px-3 py-2 text-sm text-blue-100 outline-none focus:ring-1 focus:ring-amber-400/50 appearance-none cursor-pointer">
                                <option value="" class="bg-slate-900 text-white">Any Status</option>
                                <option value="1" {{ request('available') === '1' ? 'selected' : '' }} class="bg-slate-900 text-white">Available</option>
                                <option value="0" {{ request('available') === '0' ? 'selected' : '' }} class="bg-slate-900 text-white">Borrowed</option>
                            </select>
                        </div>

                        <div class="md:col-span-2 flex gap-2">
                            <button type="submit" class="flex-1 bg-blue-600 hover:bg-blue-500 text-white py-2 rounded-xl font-bold text-sm transition-all active:scale-95">
                                Enter
                            </button>
                            <a href="/books" class="p-2 bg-red-500/10 hover:bg-red-500/20 text-red-400 rounded-xl transition-all flex items-center justify-center" title="Clear All">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                            </a>
                        </div>
                    </form>
                </div>

                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-white/5 text-blue-200/70 text-xs uppercase tracking-widest font-bold">
                            <th class="px-6 py-4">Book Details</th>
                            <th class="px-6 py-4">Genre</th>
                            <th class="px-6 py-4">Price/Year</th>
                            <th class="px-6 py-4">ISBN</th>
                            <th class="px-6 py-4">Availability</th>
                            <th class="px-6 py-4 text-right">Actions</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-white/10">
                        @foreach ($books as $book)
                            <tr class="group hover:bg-white/[0.03] transition-colors">
                                <td class="px-6 py-5">
                                    <div class="flex items-center gap-3">
                                        <div class="w-10 h-14 rounded bg-gradient-to-br from-amber-500/20 to-orange-500/20 border border-white/10 flex items-center justify-center text-amber-300 font-bold text-xs uppercase">
                                            Book
                                        </div>
                                        <div>
                                            <div class="text-white font-semibold">{{ $book->title }}</div>
                                            <div class="text-blue-100/40 text-xs italic">{{ $book->author }}</div>
                                        </div>
                                    </div>
                                </td>
                                
                                <td class="px-6 py-5 text-blue-100/70 text-sm">
                                    {{ $book->genre }}
                                </td>

                                <td class="px-6 py-5">
                                    <div class="text-white text-sm">${{ number_format($book->price, 2) }}</div>
                                    <div class="text-blue-100/30 text-[10px]">{{ $book->published_year }}</div>
                                </td>

                                <td class="px-6 py-5 text-blue-100/50 text-sm font-mono">
                                    {{ $book->isbn }}
                                </td>

                                <td class="px-6 py-5">
                                    @if($book->is_available)
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-500/10 text-green-400 border border-green-500/20">
                                            Available
                                        </span>
                                    @else
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-500/10 text-red-400 border border-red-500/20">
                                            Borrowed
                                        </span>
                                    @endif
                                </td>

                                <td class="px-6 py-5 text-right">
                                    <div class="flex justify-end items-center gap-2 opacity-0 group-hover:opacity-100 transition-opacity">

                                        <a href="/books/{{ $book->id }}/edit"
                                           class="p-2 text-blue-300 hover:bg-blue-400/20 rounded-lg transition-colors" title="Edit Book">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                            </svg>
                                        </a>

                                        <form action="/books/{{ $book->id }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="p-2 text-red-400 hover:bg-red-400/20 rounded-lg transition-colors">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-layout>