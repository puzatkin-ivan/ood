import {IObserver} from "./IObserver";

export interface IObservable {
  registerObserver(observer: IObserver);
  notifyObservers();
  removeObserver(observer: IObserver);
}