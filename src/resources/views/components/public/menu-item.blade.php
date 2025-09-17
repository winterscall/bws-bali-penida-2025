@props(['menu'])
 
<div>
  @if($menu->link_type == 'linkless')
  <li><a class="block px-4 py-2 hover:bg-gray-100" href="#">{{ $menu->title }}</a></li>
  @elseif($menu->link_type == 'external_url')
  <li><a class="block px-4 py-2 hover:bg-gray-100"
      href="{{ $menu->value_external_url }}">{{ $menu->title }}</a></li>
  @endif
</div>