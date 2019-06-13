import {IObservable} from "../../observer/IObservable";

export interface IHarmonicFunctionCollection extends IObservable {
  getAllFunctions(): any[];

  add(harmonicFunction: any): number;

  remove(id: number): void;

  edit(index: number, newFunc: any): void;

  getFunctionById(id: number): any;

  getSumHarmonicFunction(x: number): number;

  getFunctionCount(): number;
}