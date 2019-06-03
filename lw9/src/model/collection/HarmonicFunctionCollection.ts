import {HarmonicFunction} from "../HarmonicFunction";
import {IHarmonicFunctionCollection} from "./IHarmonicFunctionCollection";

export class HarmonicFunctionCollection implements IHarmonicFunctionCollection {
  private readonly _collection: HarmonicFunction[];

  constructor() {
    this._collection = [];
  }
  public remove(id: number): void {
    this._collection.splice(id, 1);
  }

  public add(harmonicFunction: HarmonicFunction): number {
    this._collection.push(harmonicFunction);

    return this._collection.length - 1;
  }

  public getAllFunctions(): any[] {
    const functions: any[] = [];
    this._collection.forEach((item: HarmonicFunction) => {
      functions.push(item.getFunction());
    });
    return functions;
  }
}