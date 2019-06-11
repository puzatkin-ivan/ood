import {HarmonicFunction} from "../HarmonicFunction";
import {IHarmonicFunctionCollection} from "./IHarmonicFunctionCollection";
import {Observable} from "../../observer/Observable";

export class HarmonicFunctionCollection extends Observable implements IHarmonicFunctionCollection {
  private readonly _collection: HarmonicFunction[];

  constructor() {
    super();
    this._collection = [];
  }
  public remove(id: number): void {
    this._collection.splice(id, 1);
    this.notifyObservers();
  }

  public edit(index: number, newFunc: any): void {
    this.remove(index);
    this.add(newFunc);
    this.notifyObservers();
  }

  public add(harmonicFunction: any): number {
    const func = new HarmonicFunction(
      harmonicFunction['type'],
      harmonicFunction['amplitude'],
      harmonicFunction['frequency'],
      harmonicFunction['phase']
    );
    this._collection.push(func);

    this.notifyObservers();
    return this._collection.length - 1;
  }

  public getAllFunctions(): any[] {
    const functions: any[] = [];
    this._collection.forEach((item: HarmonicFunction) => {
      functions.push({
        callback: item.getFunction(),
        stringView: item.toString(),
      });
    });
    return functions;
  }

  public getFunctionById(id: number): any {
    const func = this._collection[id] ? this._collection[id] : null;

    let funcObject = func ? func.toObject() : null;
    if (funcObject)
    {
      funcObject['id'] = id;
    }
    return funcObject;
  }

  public getSumHarmonicFunction(x: number): number {
    let sum = 0;
    this._collection.forEach((item: HarmonicFunction) => {
      const func = item.getFunction();
      sum += func(x);
    });

    return sum;
  }

  public getFunctionCount(): number {
    return this._collection.length;
  }

  protected getChangedData(): object {
    return {};
  }
}