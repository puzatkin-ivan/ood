import {IControlView} from "./IControlView";
import {IControlPresenter} from "../presenter/IControlPresenter";
import {Popup} from "./component/Popup";

export class ControlView implements IControlView {
  private _presenter: IControlPresenter;
  private _addItemButton: JQuery<HTMLElement>;
  private _functionForm: Popup;
  private _harmonicFuncSelect: JQuery<HTMLElement>;

  constructor() {
    this._addItemButton = $('#addItemButton');
    this._harmonicFuncSelect = $('#selectHarmonicFunction');
    this._addItemButton.on('click', this.onClickShowCreateForm.bind(this));

    this._functionForm = new Popup('harmonicFunctionPopup');
    this._functionForm.addSubmitListener(this.onSubmitHarmonicFunction.bind(this));
    this._functionForm.addDeleteListener(this.onDeleteHarmonicFunction.bind(this));
  }

  public setPresenter(presenter: IControlPresenter): void {
    this._presenter = presenter
  }

  public hideCreateFunctionForm(): void {
    this._functionForm.hide();
  }

  public showCreateFunctionForm(): void {
    this._functionForm.clear();
    this._functionForm.show();
  }

  public showEditFunctionForm(func: any): void {
    this._functionForm.setIsEdit(true);
    this._functionForm.show(func);
  }

  public showError(message: string): void {
    alert(message);
  }

  public update(harmonicFunctions: any[]): void {
    this._harmonicFuncSelect.html('');
    for (let index: number = 0; index < harmonicFunctions.length; ++index)
    {
      const func: any = harmonicFunctions[index];
      this._harmonicFuncSelect
        .append($('<option></option>').attr('value', index).text(func.stringView));
    }

    this._harmonicFuncSelect.find('option').on('click', (event) => {
      let option: string = <string>event.currentTarget.valueOf();
      let index: string = $(option).attr('value');
      this._presenter.showEditFunctionForm(Number.parseInt(index));
    });
  }

  private onClickShowCreateForm() {
    this._presenter.showCreateFunctionForm();
  }

  private onSubmitHarmonicFunction() {
    const data: any = this._functionForm.getData();
    if (this._functionForm.isEdit()) {
      this._presenter.editHarmonicFunctionAtIndex(data.id, data);
    } else {
      this._presenter.addHarmonicFunction(data);
    }
  }

  private onDeleteHarmonicFunction() {
    const data: any = this._functionForm.getData();
    this._presenter.removeHarmonicFunctionAtIndex(data.id);
  }
}