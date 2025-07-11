@if(false)
    <div class="d-flex city-location">
        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="20" viewBox="0 0 15 20" fill="none">
            <path
                d="M9.5 4C6.46736 4 4 6.19033 4 8.88247C4 9.69065 4.22762 10.492 4.66032 11.2027L9.19923 18.49C9.25966 18.5872 9.3748 18.6474 9.5 18.6474C9.6252 18.6474 9.74035 18.5872 9.80077 18.49L14.3414 11.2003C14.7724 10.492 15 9.69063 15 8.88244C15 6.19033 12.5326 4 9.5 4ZM9.5 11.3237C7.98368 11.3237 6.75002 10.2285 6.75002 8.88247C6.75002 7.5364 7.98368 6.44125 9.5 6.44125C11.0163 6.44125 12.25 7.5364 12.25 8.88247C12.25 10.2285 11.0163 11.3237 9.5 11.3237Z"
                fill="#F74952"/>
        </svg>
        {{ $data['current_city']->city }}
        <div class="dropdown">
            @foreach($data['city_list'] as $cityItem)
                <a href="https://{{ $cityItem->url }}.{{ SITE }}">{{ $cityItem->city }}</a>
            @endforeach
        </div>
    </div>
@endif
<div class="d-flex metro-location">
    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 26 26" fill="none">
        <path
            d="M13.0003 3.19057C5.82058 3.19057 0 9.06639 0 16.3147C0 20.2449 1.6961 22.808 1.6961 22.808L24.299 22.8091C24.299 22.8091 26 20.0078 26 16.3144C26 9.06639 20.1794 3.19057 13.0003 3.19057ZM23.3455 21.2103L2.69617 21.2013C2.69617 21.2013 1.59585 19.1176 1.59585 16.2732C1.59585 9.92042 6.72121 4.77006 13.0439 4.77006C19.3662 4.77006 24.4919 9.92015 24.4919 16.2732C24.4921 19.1497 23.3455 21.2103 23.3455 21.2103Z"
            fill="#F74952"/>
        <path
            d="M16.6742 6.67562L16.511 6.67535L13.0434 13.4703L9.45094 6.61732L4.53235 18.9974H3.26123V19.9918H10.2249V18.9974H8.84317L10.2249 15.1283L13.0434 19.9918L15.7515 15.1283L17.133 18.9974H15.7515V19.9918H22.6596V18.9974H21.4629L16.6742 6.67562Z"
            fill="#F74952"/>
    </svg>
    Метро
    <div class="dropdown">
        @foreach($data['metro'] as $metro)
            <a href="/{{ $metro->filter_url }}">{{ $metro->value }}</a>
        @endforeach
    </div>
</div>
