<?php

class libHTML
{
  public function renderHeader(string $title): void
  {
    $template = "
            <html>
              <head>
                <title>$title</title>
              </head>
              <body>
        ";
    echo $template;
  }

  public function renderFooter(): void
  {
    $template = "
              </body>
              </html>
        ";
    echo $template;
  }
}




