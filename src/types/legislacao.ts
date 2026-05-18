export type LegislationCategory = 'Portaria' | 'Resolução' | 'Norma' | 'Documento';

export interface LegislationDocument {
  id: string;
  title: string;
  year: number;
  category: LegislationCategory;
  description?: string;
  fileUrl: string;
}
