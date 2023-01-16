import { User } from "../user/User";
import { Project } from "../project/Project";

export type Task = {
  assignedTo?: User | null;
  createdAt: Date;
  estimationDays: number | null;
  id: string;
  project?: Project | null;
  startDate: Date | null;
  status?: "New" | "Option_2" | "Option_3" | "Option_4";
  title: string;
  updatedAt: Date;
};
