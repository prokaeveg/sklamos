<?php session_start(); ?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <title>Соглашение на обработку персональных данных</title>
    <link rel="stylesheet" href="libs/bootstrap/css/bootstrap-reboot.css">
    <link rel="stylesheet" href="libs/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css&family=Lora:400,700|Muli:300,400,600,700,800&amp;subset=cyrillic-ext" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/pdpa.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/logout.css">
  </head>

  <body>
    <div id="progressbar"></div>
    <div class="wrapper">
      <?php require 'templates/header.php' ?>

        <div class="content">
          <div class="containerAbout content-pdpa">
            <div class="header">
              <div class="page-header">
                <h1>Соглашение на обработку персональных данных</h1>
              </div>
            </div>
            <div class="article ">
              <p>Предоставляя свои персональные данные Пользователь даёт согласие на обработку, хранение и использование своих персональных данных на основании ФЗ № 152-ФЗ «О персональных данных» от 27.07.2006 г. в следующих целях:</p>
              <ul>
                <li>Осуществление клиентской поддержки</li>
                <li>Получения Пользователем информации о маркетинговых событиях</li>
                <li>Проведения аудита и прочих внутренних исследований с целью повышения качества предоставляемых услуг.</li>
              </ul>
              <p>Под персональными данными подразумевается любая информация личного характера, позволяющая установить личность Пользователя, такая как:</p>
              <ul>
                <li>Имя</li>
                <li>Контактный телефон</li>
                <li>Адрес электронной почты</li>
                <li>Почтовый адрес</li>
              </ul>
              <p>Персональные данные Пользователей хранятся исключительно на электронных носителях и обрабатываются с использованием автоматизированных систем, за исключением случаев, когда неавтоматизированная обработка персональных данных необходима в связи с исполнением требований законодательства.</p>
              <p>Персональные данные Пользователей, указываемых ими в форме регистрации в качестве контактной информации, размещаются на сайте в открытом доступе.</p>
              <p>Компания обязуется не передавать полученные персональные данные третьим лицам, за исключением следующих случаев:</p>
              <p>По запросам уполномоченных органов государственной власти РФ только по основаниям и в порядке, установленным законодательством РФ</p>
              <p>Стратегическим партнерам, которые работают с Компанией для предоставления продуктов и услуг, или тем из них, которые помогают Компании реализовывать продукты и услуги потребителям. Мы предоставляем третьим лицам минимальный объем персональных данных, необходимый только для оказания требуемой услуги или проведения необходимой транзакции.</p>
              <p>Компания оставляет за собой право вносить изменения в одностороннем порядке в настоящие правила, при условии, что изменения не противоречат действующему законодательству РФ. Изменения условий настоящих правил вступают в силу после их публикации на Сайте.</p>
            </div>
          </div>

          <?php require 'templates/footer.php' ?>
        </div>
    </div>

    <?php require 'templates/scripts.php' ?>
  </body>

  </html>