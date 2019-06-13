import {IHarmonicFunctionCollection} from "../model/collection/IHarmonicFunctionCollection";
import {IGraphicView} from "../view/IGraphicView";
import {IGraphicPresenter} from "./IGraphicPresenter";

export class GraphicPresenter implements IGraphicPresenter {
  private _view: IGraphicView;
  private _model: IHarmonicFunctionCollection;

  constructor(view: IGraphicView, model: IHarmonicFunctionCollection) {
    this._model = model;
    this._view = view;

    this._model.registerObserver(this);
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