import { UserWhereUniqueInput } from "../user/UserWhereUniqueInput";
import { ProjectWhereUniqueInput } from "../project/ProjectWhereUniqueInput";

export type TaskUpdateInput = {
  assignedTo?: UserWhereUniqueInput | null;
  estimationDays?: number | null;
  project?: ProjectWhereUniqueInput | null;
  startDate?: Date | null;
  status?: "New" | "Option_2" | "Option_3" | "Option_4";
  title?: string;
};
