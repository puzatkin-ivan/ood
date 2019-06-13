import {IHarmonicFunctionCollection} from "../model/collection/IHarmonicFunctionCollection";
import {ITableView} from "../view/ITableView";
import {ITablePresenter} from "./ITablePresenter";

export class TablePresenter implements ITablePresenter{
  private _view: ITableView;
  private _model: IHarmonicFunctionCollection;

  constructor(view: ITableView, model: IHarmonicFunctionCollection) {
    this._view = view;
    this._model = model;

    this._model.registerObserver(this);
  }

  public getHarmonicSum(x: number): number {
    return this._model.getSumHarmonicFunction(x);
  }

  public getHarmonicFunctionCount(): number {
    return this._model.getFunctionCount();
  }

  public drawTable(): void {
    this._view.drawTable();
  }

  public update(data: object): void {
    this._view.update();
  }
}