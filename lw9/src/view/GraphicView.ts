import {IGraphicView} from "./IGraphicView";
import {IGraphicPresenter} from "../presenter/IGraphicPresenter";

export class GraphicView implements IGraphicView {
  private _presenter: IGraphicPresenter;
  private _canvas: any;
  private _axes: any;
  private _container: JQuery<HTMLElement>;

  constructor(idContainer: string) {
    this._container = $('#' + idContainer);
    this._canvas = document.getElementById('canvas');
    this._axes = {
      x: 0.5 * this._canvas.width,
      y: 0.5 * this._canvas.height,
      scale: 40,
    };
  }

  public setPresenter(presenter: IGraphicPresenter): void {
    this._presenter = presenter
  }

  public draw(): void {
    this.clear();

    this.drawAxes();
    this.drawHarmonicFunctionSum('#b12409', 1);
  }

  public show(): void {
    this._container.show();
  }

  public hide(): void {
    this._container.hide();
  }

  private drawAxes() {
    const context = this._canvas.getContext('2d');

    const centerX: any = this._axes.x;
    const centerY: any = this._axes.y;
    const width = this._canvas.width;
    const height = this._canvas.height;
    const minX: any = 0;

    context.beginPath();
    context.strokeStyle = '#808080';
    context.moveTo(minX, centerY);
    context.lineTo(width, centerY);
    context.moveTo(centerX, 0);
    context.lineTo(centerX, height);
    context.stroke();
  }

  private drawHarmonicFunctionSum(color: any, thick: any) {
    const context = this._canvas.getContext('2d');
    const minX = -this._axes.x;
    const maxX = this._canvas.width - this._axes.x;
    const scale = this._axes.scale;
    const centerX = this._axes.x;
    const centerY = this._axes.y;

    context.beginPath();
    context.lineWidth = thick;
    context.strokeStyle = color;

    for (let i = minX; i <= maxX; i++) {
      let currX = i;
      let currY = scale * this._presenter.getHarmonicSum(currX / scale);
      if (i === minX) {
        context.moveTo(centerX + currX, centerY - currY);
      }
      else {
        context.lineTo(centerX + currX, centerY - currY);
      }
    }
    context.stroke();
  }

  public clear(): void {
    const context = this._canvas.getContext('2d');
    context.clearRect(0, 0, this._canvas.width, this._canvas.height);
    this.drawAxes();
  }
}