import {HarmonicFunction} from "../HarmonicFunction";

export abstract class IHarmonicFunctionCollection {
  public abstract getAllFunctions(): any[];

  public abstract add(harmonicFunction: HarmonicFunction): number;

  public abstract remove(id: number): void;
}