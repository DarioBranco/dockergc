from sqlalchemy import Column, Integer, String, Text
from sqlalchemy.ext.declarative import declarative_base

Base = declarative_base()
class washing_machine_model(Base):
	__tablename__ = 'washing_machine_model'
	id = Column(Integer, primary_key=True)
	MakeM = Column(Text)
	Type = Column(Text)
	Pgms = Column(Text)
