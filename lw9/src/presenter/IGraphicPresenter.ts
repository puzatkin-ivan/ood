import {IObserver} from "../observer/IObserver";

export interface IGraphicPresenter extends IObserver{
  getHarmonicSum(x: number): number;

  drawGraph(): void;
}