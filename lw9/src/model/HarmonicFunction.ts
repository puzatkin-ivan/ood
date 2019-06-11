export class HarmonicFunction {
  private readonly _type: string;

  private readonly _amplitude: number;

  private readonly _frequency: number;

  private readonly _phase: number;

  constructor(type: string, amplitude: number, frequency: number, phase: number) {
    this._type = type;
    this._amplitude = amplitude;
    this._frequency = frequency;
    this._phase = phase;
  }

  public getFunction(): any {
    const harmonicFunction = (this._type == 'sin') ? Math.sin : Math.cos;
    const amplitude = Number(this._amplitude) ? Number(this._amplitude) : 0;
    const frequency = Number(this._frequency) ? Number(this._frequency) : 0;
    const phase = Number(this._phase) ? Number(this._phase) : 0;

    return (x: any) => {
      return amplitude * harmonicFunction(frequency * x + phase);
    };
  }

  public toString(): string {
    const amplitude = Number(this._amplitude) ? Number(this._amplitude) : 0;
    const frequency = Number(this._frequency) ? Number(this._frequency) : 0;
    const phase = Number(this._phase) ? Number(this._phase) : 0;

    return amplitude + '*' + this._type + '(' + frequency + '*x +' + phase + ')';
  }

  toObject(): object {
    return {
      type: this._type,
      amplitude: this._amplitude,
      frequency: this._frequency,
      phase: this._phase,
    };
  }
}