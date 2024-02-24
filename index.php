<?php
    ini_set('display_errors', 1);
    $contentFile = fopen("content.json", "r");
    $contentJSON = fread($contentFile, filesize("content.json"));
    $content = json_decode($contentJSON);

    $me = $content->me;
    $projects = $content->projects;
?>
<!DOCTYPE HTML>
<html class="no-js" lang="en">
<head>
  <meta charset="utf-8">
  <title>Mairo</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="robots" content="noindex">
  <link rel="icon" type="image/x-icon" href="./img/favicon.png">
  <link rel="stylesheet" href='https://fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic,700italic&subset=latin,latin-ext'>
  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/main.css">
</head>
<body>
  <header id="header">
    <h1 id="header__title"><?= $me->name ?></h1>
  </header>
  <main>
    <p id="intro">
      <?= $me->bio ?>
    </p>
    <section id="projects">
      <h2 class="title--secondary">Projects</h2>
      <ul class="projects">
        <?php foreach($projects as $project): ?>
          <li class="project">
            <div class="project__image">
              <div class="project__image__container">
                <img class="<?= "project__image__img img--{$project->title}" ?>" src="<?= $project->img ?>" alt="Project view"/>
              </div>
            </div>
            <div class="project__content">
              <h3 class="project__content__title title--tertiary">
                <?= $project->title ?>
              </h3>
              <p class="project__content__description">
                <?= $project->description ?>
              </p>
              <ul class="project__content__stack">
                <?php foreach($project->stack as $technology): ?>
                  <li class="project__content__stack__item">
                    <?= $technology ?>
                  </li>
                <?php endforeach ?>
              </ul>
              <div class="project__content__links">
                <a href="<?= $project->live ?>" class="project__content__links__link">
                  <img class="project__content__links__link__img" src="img/external-link.svg" alt="Live link"/>
                  Live Demo
                </a>
                <a href="<?= $project->github ?>" class="project__content__links__link">
                  <img class="project__content__links__link__img" src="img/github-mark.svg" alt="GitHub"/>
                  View Source
                </a>
              </div>
            </div>
          </li>
          <?php endforeach ?>
      </ul>
    </section>
  </main>
  <footer id="footer">
      <a class="footer__link" href="">GitHub</a>
      <span class="footer__separator">||</span>
      <a class="footer__link" href="">LinkedIn</a>
  </footer>
</body>
</html>