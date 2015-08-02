<?php namespace Frknikiz\CustomElfinder;

  class Cutil
  {
      public function getJs()
      {
        return \View::make("CustomElfinder::js")->render();
      }
  }