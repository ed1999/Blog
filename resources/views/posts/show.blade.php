<x-app-layout>

    <div class="container py-8">
        <h1 class="text-4xl font-bold text-gray-700">{{ $post->name }}</h1>



        <div class="text-lg text-gray-500 mb-2">
            {!! $post->extract !!}
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            {{-- Contenido del post --}}
            <div class="lg:col-span-2">

                <figure>
                    @if ($post->image)
                        <img class="w-full h-72 object-cover object-center" src="{{ Storage::url($post->image->url) }}"
                            alt="">
                    @else
                        <img class="w-full h-72 object-cover object-center"
                            src="https://cdn.pixabay.com/photo/2016/11/29/02/05/audience-1866738_1280.jpg"
                            alt="">
                    @endif
                </figure>

                <div class="text-base text-gray-700 mt-4">
                    {!! $post->body !!}
                </div>

            </div>
            {{-- Contenido relacionado --}}
            <div class="card">
                <div class="card-body">
                    <h1 class="text-2xl font-bold text-gray-600 mb-4">Más En {{ $post->category->name }}</h1>
                    <ul>
                        @foreach ($similares as $similar)
                            <li class="mb-4">
                                <a class="flex" href="{{ route('posts.show', $similar) }}">
                                    @if ($similar->image)
                                        <img class="max-w-36 h-20 object-cover object-center"
                                            src="{{ Storage::url($similar->image->url) }}" alt="">
                                    @else
                                        <img class="max-w-36 h-20 object-cover object-center"
                                            src="https://cdn.pixabay.com/photo/2016/11/29/02/05/audience-1866738_1280.jpg"
                                            alt="">
                                    @endif
                                    <span class="ml-2 text-gray-600">{{ $similar->name }}</span>
                                </a>
                            </li>
                        @endforeach
                    </ul>

                    </br>
                </div>
            </div>
            <style>
                .card {
                    background-color: azure;
                    border-radius: 10px;
                    box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3);
                    opacity: 1;
                }

                .card-body {
                    padding: 1rem;
                }
/* 
                .card:hover {
                    box-shadow: 0px 20px 40px rgba(0, 0, 0, 0.5);
                    transform: translateY(-10px);
                }

                .card:hover .card-content {
                    transform: translateY(-20px);
                } */
            </style>
        </div>

    </div>

</x-app-layout>
