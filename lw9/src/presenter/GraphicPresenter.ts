import {IHarmonicFunctionCollection} from "../model/collection/IHarmonicFunctionCollection";
import {IGraphicView} from "../view/IGraphicView";
import {IGraphicPresenter} from "./IGraphicPresenter";
import {IObserver} from "../observer/IObserver";
import {Observable} from "../observer/Observable";

export class GraphicPresenter implements IGraphicPresenter, IObserver {
  private _view: IGraphicView;
  private _model: IHarmonicFunctionCollection;

  constructor(view: IGraphicView, model: IHarmonicFunctionCollection) {
    this._model = model;
    this._view = view;

    if (this._model instanceof Observable)
    {
      this._model.registerObserver(this);
    }
  }

  public update() {
    this.drawGraph();
  }

  public getHarmonicSum(x: number): number {
    return this._model.getSumHarmonicFunction(x);
  }

  public drawGraph(): void {
    if (this._model.getFunctionCount() > 0) {
      this._view.draw();
    } else {
      this._view.clear();
    }
  }
}