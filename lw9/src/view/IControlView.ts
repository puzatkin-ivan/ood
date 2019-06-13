import {IControlPresenter} from "../presenter/IControlPresenter";

export interface IControlView {
  setPresenter(presenter: IControlPresenter);
  hideCreateFunctionForm(): void;
  update(harmonicFunctions: any[]): void;
  showError(message: string): void;
  showCreateFunctionForm(): void;
  showEditFunctionForm(func: any): void;
}
