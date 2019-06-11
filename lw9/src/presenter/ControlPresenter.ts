import {IControlPresenter} from "./IControlPresenter";
import {IHarmonicFunctionCollection} from "../model/collection/IHarmonicFunctionCollection";
import {IControlView} from "../view/IControlView";
import {IObserver} from "../observer/IObserver";
import {Observable} from "../observer/Observable";

export class ControlPresenter implements IControlPresenter, IObserver {
  private _model: IHarmonicFunctionCollection;
  private _view: IControlView;

  constructor(view: IControlView, model: IHarmonicFunctionCollection) {
    this._model = model;
    this._view = view;

    if (this._model instanceof  Observable)
    {
      this._model.registerObserver(this);
    }
  }

  public update(): void {
    this._view.update(this._model.getAllFunctions());
  }

  public addHarmonicFunction(newFunc: any) {
    if (this.isFunctionValid(newFunc)) {
      this._model.add(newFunc);
      this._view.hideCreateFunctionForm();
    } else {
      this._view.showError('Invalid function data');
    }
  }

  public editHarmonicFunctionAtIndex(index: number, newFunc: any) {
    if (this.isFunctionValid(newFunc)) {
      this._model.edit(index, newFunc);
      this._view.hideCreateFunctionForm();
    } else {
      this._view.showError('Invalid function data');
    }
  }

  public removeHarmonicFunctionAtIndex(index: number) {
    this._model.remove(index);
  }

  public showCreateFunctionForm() {
    this._view.showCreateFunctionForm();
  }

  public showEditFunctionForm(index: number) {
    const func = this._model.getFunctionById(index);
    this._view.showEditFunctionForm(func);
  }

  private isFunctionValid(newFuncObj: any): boolean {
    return (newFuncObj.hasOwnProperty('type') &&
      (newFuncObj.type === 'sin' || newFuncObj.type === 'cos')) &&
      (newFuncObj.hasOwnProperty('amplitude') && !isNaN(Number(newFuncObj.amplitude))) &&
      (newFuncObj.hasOwnProperty('frequency') && !isNaN(Number(newFuncObj.frequency))) &&
      (newFuncObj.hasOwnProperty('phase') && !isNaN(Number(newFuncObj.phase)));
  }
}