import {ITableView} from "./ITableView";
import {ITablePresenter} from "../presenter/ITablePresenter";

export class TableView implements ITableView {
  private _presenter: ITablePresenter;
  private _axes: { minX: number; maxX: number; scale: number };
  private _tableContainer: JQuery<HTMLElement>;

  constructor(idTable: string) {
    this._tableContainer = $('#' + idTable);
    this._axes = {
      minX: -10,
      maxX: 10,
      scale: 40,
    };
  }

  public setPresenter(presenter: ITablePresenter) {
    this._presenter = presenter;
  }

  public show() {
    this._tableContainer.show();
  }

  public drawTable(): void {
    if (this._presenter.getHarmonicFunctionCount() == 0)
    {
      return;
    }

    const minX = this._axes.minX;
    const maxX = this._axes.maxX;

    const tableBody = this._tableContainer.find('tbody');
    tableBody.html('');
    let xNumber = 1;
    for (let currX = minX; currX <= maxX ; currX++)
    {
      const currY = this._presenter.getHarmonicSum(currX);
      const rowInfo = { x: currX, y: currY.toFixed(2)};

      const html = '<th scope="row">' + xNumber + '</th><td>' + rowInfo.x + '</td><td>' + rowInfo.y + '</td>';
      const row = $('<tr></tr>').append(html);
      tableBody.append(row);
      ++xNumber;
    }
  }

  public update(): void {
    if (this._presenter.getHarmonicFunctionCount() > 0)
    {
      this.drawTable();
    }
  }

  public hide(): void {
    this._tableContainer.hide();
  }
}