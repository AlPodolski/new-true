<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <script src="{{ mix('js/app.js') }}"></script>
    <script src="{{ asset('js/script_old.js') }}"></script>

</head>
<body>
<header>
    <div class="top-header">
        <div class="container">
            <div class="d-flex top-header-items-wrap">
                <div class="logo">
                    <img src="/img/logo.webp" alt="">
                </div>
                <div class="search">
                    <form action="" class="search-form position-relative">
                        <input type="text" class="text-input">
                        <button class="yellow-btn position-absolute" type="submit">Поиск</button>
                    </form>
                </div>
                <div class="top-nav">
                    <div class="top-nav-list">
                        <a href="#">Кабинет</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-bottom-area">
        <div class="container">
            <div class="d-flex">
                <div class="all-menu position-relative" id="all-menu" >
                    <div class="open-menu-btn" onclick="toggle_class_to_block('all-menu', 'open-menu')">
                        <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="24.75px" height="24.75px" viewBox="0 0 24.75 24.75" style="enable-background:new 0 0 24.75 24.75;" xml:space="preserve"	><g>	<path d="M0,3.875c0-1.104,0.896-2,2-2h20.75c1.104,0,2,0.896,2,2s-0.896,2-2,2H2C0.896,5.875,0,4.979,0,3.875z M22.75,10.375H2		c-1.104,0-2,0.896-2,2c0,1.104,0.896,2,2,2h20.75c1.104,0,2-0.896,2-2C24.75,11.271,23.855,10.375,22.75,10.375z M22.75,18.875H2		c-1.104,0-2,0.896-2,2s0.896,2,2,2h20.75c1.104,0,2-0.896,2-2S23.855,18.875,22.75,18.875z"/></g></svg>
                        Все категории
                    </div>
                    <nav class="sub-menu position-absolute">
                        <div class="sub-menu-item-wrap">
                            <a href="#" class="sub-menu-item">Меню 1
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
                                </svg>
                            </a>
                            <div class="sub-menu-list position-absolute">
                                <a href="#" class="sub-menu-list-item">Меню</a>
                                <a href="#" class="sub-menu-list-item">Меню</a>
                                <a href="#" class="sub-menu-list-item">Меню</a>
                                <a href="#" class="sub-menu-list-item">Меню</a>
                            </div>
                        </div>
                        <div class="sub-menu-item-wrap"><a href="#" class="sub-menu-item">Меню 2</a></div>
                        <div class="sub-menu-item-wrap"><a href="#" class="sub-menu-item">Меню 3</a></div>
                        <div class="sub-menu-item-wrap"><a href="#" class="sub-menu-item">Меню 4</a></div>
                        <div class="sub-menu-item-wrap"><a href="#" class="sub-menu-item">Меню 5</a></div>
                        <div class="sub-menu-item-wrap"><a href="#" class="sub-menu-item">Меню 6</a></div>
                    </nav>
                </div>
                <nav class="main-menu">
                    <a href="#" class="main-menu-item">Главная</a>
                    <a href="#" class="main-menu-item">Еще страница</a>
                    <a href="#" class="main-menu-item">Еще страница 2</a>
                    <a href="#" class="main-menu-item">Блог</a>
                </nav>
            </div>
        </div>
    </div>

</header>
<main>
    <div class="content-wrap">
        <div class="container">
            <div class="content ">
                <div class="post-single d-flex">
                    <div class="left"><img src="/img/griller-tree.webp" alt=""></div>
                    <div class="right">
                        <h1>Страница товара</h1>
                        <div class="bold-text single-price m-bottom-20">От 2000 р.</div>
                        <div class="yellow-btn phone single-phone m-bottom-20">Показать телефон</div>
                        <div class="single-option m-bottom-20"><span class="bold-text">Район:</span> Район</div>
                        <div class="single-option m-bottom-20"><span class="bold-text">Метро: </span>Метро</div>
                        <div class="single-option m-bottom-20"><span class="bold-text">Возраст: </span>22</div>
                        <div class="single-option m-bottom-20"><span class="bold-text">Вес: </span>55</div>
                        <div class="single-option m-bottom-20"><span class="bold-text">Грудь: </span>4</div>
                        <div class="single-option m-bottom-20"><span class="bold-text">Не моложе: </span>18(ограничение по возрасту)</div>
                        <div class="single-option m-bottom-20"><span class="bold-text">Интимная стрижка: </span>Интимная стрижка</div>
                        <div class="single-option m-bottom-20"><span class="bold-text">Размер одежды: </span>45</div>
                        <div class="single-option m-bottom-20"><span class="bold-text">Размер обуви: </span>42</div>
                        <div class="single-option m-bottom-20"><span class="bold-text">Контактов в час: </span>2</div>
                    </div>
                    <div class="more-post-info m-top-20">
                        <div class="about-text">
                            <div class="bold-text m-bottom-20">Описание</div>
                            Прекрасная девушка с прелестными формами и ухоженной внешностью, обладающая знаниями обо
                            всем- что касается доставления мужчине удовольствия. Пора свои мечты и потайные желания
                            воплотить в реальность Приглашаю Вас окунуться в мир бесконечного блаженства, спокойствия и
                            немного развратного отдыха.
                        </div>
                        <div class="review-list m-top-20">
                            <div class="bold-text m-bottom-20">Отзывы</div>
                            <div class="review-item">
                                <div class="user-name bold-text">Игор</div>
                                <div class="review-text">Єто мой сайт</div>
                            </div>
                        </div>
                        <form class="review-form m-top-20 m-bottom-20">
                            <div class="bold-text m-bottom-20">Написать отзыв</div>
                            @csrf
                            <div class="form-group">
                                <label for="name">Имя</label>
                                <input placeholder="Имя" type="text" name="name" id="name">
                            </div>
                            <div class="form-group m-top-20">
                                <label for="text">Текст</label>
                                <textarea placeholder="Текст" name="text" id="text"></textarea>
                            </div>

                            <button class="yellow-btn m-top-20" type="submit">Отправить</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
</body>
</html>
