import {IView} from "./IView";

export class WindowView implements IView {
  private _container: HTMLElement;

  constructor(id: string) {
    this._container = document.getElementById(id);
    this.addEventListeners();
  }

  private addEventListeners(): void {
    $('#addItemButton').on('mousedown', this.openPopup);
    $('#editItemButton').on('mousedown', this.openPopupWithHarmonicFunction);
  }

  private openPopup(): void {
    $('#jsHarmonicFunctionPopup').modal('show');
    console.log('before event');
    $('#saveItemButton').on('click', this.sendRequestSaveItem);
  }

  private sendRequestSaveItem() {
    const functionParams = $('#jsHarmonicFunctionForm').serializeArray();
    console.log(functionParams);
  }

  private openPopupWithHarmonicFunction() {

  }

  public render(): void {
  }
}