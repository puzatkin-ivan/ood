<?php

namespace designer;

use shape\PictureDraft;

interface DesignerInterface
{
    public function createDraft(): PictureDraft;
}