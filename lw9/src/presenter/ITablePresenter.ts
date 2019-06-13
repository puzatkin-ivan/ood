import {IObserver} from "../observer/IObserver";

export interface ITablePresenter extends IObserver {
  getHarmonicFunctionCount(): number;
  getHarmonicSum(x: number): number;

  drawTable(): void;
}