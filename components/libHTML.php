<?php
class libHTML
{
    public function renderPage(string $title, string $content): void
    {
        $template = "
    <html>
      <head>
        <title>$title</title>
      </head>
      <body>
        $content
      </body>
    </html>
    ";
        echo $template;
    }

    public function renderTable_(array $header, array $items): string
    {
        $headerHtml = implode("\n", array_map( function ($item) { return "<th>$item</th>"; }, $header));
        $bodyHtml = "";
        foreach($items as $row) {
            $bodyHtml .= "<tr>";
            $bodyHtml .= implode("\n", array_map( function ($item) { return "<th>$item</th>"; }, $row));
            $bodyHtml .= "</tr>";
        }
        $bodyHtml = "<tbody>". $bodyHtml . "</tbody>";

        return "<table border=1>$headerHtml $bodyHtml</table>";
    }
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




