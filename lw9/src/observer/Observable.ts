import {IObservable} from "./IObservable";
import {IObserver} from "./IObserver";

export abstract class Observable implements IObservable {
  private _observers: IObserver[] = [];

  public notifyObservers() {
    const data = this.getChangedData();
    const observers = Object.assign([], this._observers);

    observers.forEach((observer: IObserver) => {
      observer.update(data);
    });
  }

  public registerObserver(observer: IObserver) {
    this._observers.push(observer);
  }

  public removeObserver(observer: IObserver) {
    const observers = Object.assign([], this._observers);

    observers.forEach((item, index) => {
      if (item == observer) {
        this._observers.slice(index, 1);
      }
    });
  }

  protected abstract getChangedData(): object;
}