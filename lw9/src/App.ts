import {HarmonicFunctionCollection} from "./model/collection/HarmonicFunctionCollection";
import {WindowView} from "./view/WindowView";
import {IView} from "./view/IView";

class App {
  private static JS_CONTAINER_ID = 'jsBody';
  private _harmonicFunctionCollection: HarmonicFunctionCollection;
  /** @type {!IView|IObserver} */
  private _view: IView;

  constructor() {
    this._harmonicFunctionCollection = new HarmonicFunctionCollection();
    this._view = new WindowView(App.JS_CONTAINER_ID);
  }
}

window.addEventListener('load', function() {
  new App();
});