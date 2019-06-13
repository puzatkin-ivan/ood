import {ITablePresenter} from "../presenter/ITablePresenter";

export interface ITableView {
  setPresenter(presenter: ITablePresenter);
  drawTable(): void;
  update(): void;
  show(): void
  hide(): void;
}