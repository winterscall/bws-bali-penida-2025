<div class="mt-2 lg:mt-0 lg:w-full lg:max-w-md lg:flex-shrink-0 lg:px-0">
  <div class="mx-auto max-w-7xl px-4 sm:px-6">

    <!-- Berita Balai Terbaru -->
    <div class="mx-auto py-2 sm:py-2 lg:max-w-none">
      <p class="text-2xl tracking-tight leading-loose font-light">
        <span class="font-extrabold">Berita</span>Terkini
      </p>

      @use('App\Models\News\NewsType')
      <div class="lg:mt-0 lg:w-full lg:max-w-md lg:flex-shrink-0">
        <div class="lg:flex lg:flex-col">
          <div class="max-w-xs">
            <ul role="list" class="grid gap-x-8 gap-y-1">
              <?php
              foreach (NewsType::where('slug', 'berita-balai')->first()->news()->whereNotNull('published_at')->orderBy('published_at', 'desc')->limit(4)->get() as $berita) :
              ?>
                <li class="ring-1 ring-inset ring-gray-900/5 rounded mb-4 tkpsda-shadow">
                  <div class="flex items-center gap-x-6">
                    <a href="{{ route('berita.show', ['slug' => $berita->slug]) }}">
                      <img src="{{ $berita->featured_image_path }}" alt="{{ $berita->featured_image_desc }}" title="{{ $berita->title }}" class="rounded h-24 w-auto object-cover">
                    </a>
                    <div class="mx-1">
                      <a title="{{ $berita->title }}" href="{{ route('berita.show', ['slug' => $berita->slug]) }}">
                        <h3 class="text-sm font-semibold leading-7 tracking-tight text-gray-900">
                          {{ strlen($berita->title) > 40 ? substr($berita->title, 0, 40) . '...' : $berita->title }}
                        </h3>
                      </a>
                      <p class="text-sm leading-2 text-gray-600">
                        <i class="fa-regular fa-calendar mr-2"></i> {{ $berita->published_at->format('d-m-Y') }}
                      </p>
                    </div>
                  </div>
                </li>
              <?php
              endforeach;
              ?>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>