import {IGraphicPresenter} from "../presenter/IGraphicPresenter";

export interface IGraphicView {
  setPresenter(presenter: IGraphicPresenter);
  draw(): void;
  clear(): void;
  show(): void;
  hide(): void;
}
