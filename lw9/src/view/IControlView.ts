
export interface IControlView {
  hideCreateFunctionForm(): void;
  update(harmonicFunctions: any[]): void;
  showError(message: string): void;
  showCreateFunctionForm(): void;
  showEditFunctionForm(func: any): void;
}
