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

  public function renderLogout(): void
  {
    $template = "
                <form action='/logout' method='post'>
                  <input type='submit' value='LOGOUT'/>
                </form>
              </body>
              </html>
        ";
    echo $template;
  }
}




