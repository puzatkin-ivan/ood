<?php

namespace Exporter;

use Document\DocumentInterface;
use Document\DocumentItemInterface;

class HtmlExporter
{
    public function export(DocumentInterface $document): string
    {
        $documentItems = $document->getItems();
        $documentItemsStr = $this->renderDocumentItems($documentItems);
        $htmlDocument = $this->renderDocument($document->getTitle(), $documentItemsStr);
        return $htmlDocument;
    }

    /**
     * @param DocumentItemInterface[] $documentsItems
     * @return string
     */
    private function renderDocumentItems(array $documentsItems): string
    {
        $result = '';
        foreach ($documentsItems as $documentsItem)
        {
            $result .= htmlspecialchars($documentsItem->toString());
        }
        return $result;
    }

    private function renderDocument(string $title, string $body): string
    {
        return <<<EOF
<!DOCTYPE html>
<html>
  <head>
    <title>{$title}</title>
  </head>
  <body>
    {$body}
  </body>
</html>
EOF;
    }
}