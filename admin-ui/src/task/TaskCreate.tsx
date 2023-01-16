import * as React from "react";

import {
  Create,
  SimpleForm,
  CreateProps,
  ReferenceInput,
  SelectInput,
  NumberInput,
  DateTimeInput,
  TextInput,
} from "react-admin";

import { UserTitle } from "../user/UserTitle";
import { ProjectTitle } from "../project/ProjectTitle";

export const TaskCreate = (props: CreateProps): React.ReactElement => {
  return (
    <Create {...props}>
      <SimpleForm>
        <ReferenceInput source="user.id" reference="User" label="Assigned To">
          <SelectInput optionText={UserTitle} />
        </ReferenceInput>
        <NumberInput
          step={1}
          label="Estimation (days)"
          source="estimationDays"
        />
        <ReferenceInput source="project.id" reference="Project" label="Project">
          <SelectInput optionText={ProjectTitle} />
        </ReferenceInput>
        <DateTimeInput label="Start Date" source="startDate" />
        <SelectInput
          source="status"
          label="Status"
          choices={[
            { label: "Option 1", value: "New" },
            { label: "Option 2", value: "Option_2" },
            { label: "Option 3", value: "Option_3" },
            { label: "Option 4", value: "Option_4" },
          ]}
          optionText="label"
          optionValue="value"
        />
        <TextInput label="Title" source="title" />
      </SimpleForm>
    </Create>
  );
};
