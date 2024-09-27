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
  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/main.css?v=1.0.4">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Noto+Sans&display=swap">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@700&display=swap">
</head>
<body>
  <header id="header">
    <h1 id="header__title"><?= $me->name ?></h1>
    <div class="links">
      <a class="links__link" href="<?= $me->github ?>">GitHub</a>
      <a class="links__link" href="<?= $me->linkedin ?>">LinkedIn</a>      
    </div>
  </header>
  <main>
    <section id="projects">
      <h2 class="title--secondary">Projects</h2>
      <ul class="projects">
        <?php foreach($projects as $project): ?>
          <li class="<?= isset($project->img) ? 'project' : 'project project-no_image'?>">
            <div class="project__image">
              <div class="project__image__container">
                <img class="<?= "project__image__img img--{$project->title}" ?>" src="<?= $project->img ?>" alt="<?= $project->title ?>" loading="lazy">
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
                <?php foreach($project->github as $key => $link): ?>
                  <a href="<?= $link ?>" class="project__content__links__link">
                    <img class="project__content__links__link__img" src="img/github-mark.svg" alt="GitHub">
                    <?= $key ?> Source
                  </a>
                <?php endforeach ?>
                <?php if (isset($project->live)): ?>
                  <a href="<?= $project->live ?>" class="project__content__links__link">
                    <img class="project__content__links__link__img" src="img/external-link.svg" alt="Live link">
                    Live Demo
                  </a>
                <?php endif; ?>
              </div>
            </div>
          </li>
          <?php endforeach ?>
      </ul>
    </section>
  </main>
</body>
</html>
